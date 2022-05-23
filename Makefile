.PHONY:  deploy dbdeploy import dbimport help update updateremote

## Imposto le variabili
path=~/public_html/
localpath=http://5.94.76.53:8888/site_qpc_theme
ssh=qpcdev58@77.104.135.201
port='ssh -p 18765'
port-db='-p18765'
domain=https://www.qpcdev.it

help: ## Mostro l'aiuto
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

import: ## Importo i files remoti  (il comando --delete è da valutare sia in import che in export)
	rsync -avzh -e $(port) $(ssh):$(path) ./ \
        --exclude   live-config.php
				--exclude cgi-bin
				--exclude .htaccess
				--exclude php_errorlog
				--exclude .DS_Store
				wp rewrite flush


deploy: ## Carico l'applicazione in remoto
	rsync -avzh -e  $(port) ./ $(ssh):$(path) \
				--exclude Makefile \
				--exclude local-config.php \
				--exclude wp-config-local.php \
				--exclude .git \
				--exclude .gitignore \
				--exclude .idea \
				--exclude .htaccess \
				--exclude .composer \
				--exclude .composer.lock \
				--exclude robots.txt \
				--exclude utility \
				--exclude wp-content/themes/mos/node_modules \
				--exclude wp-content/themes/mos/scss \
				--exclude wp-content/themes/mos/.sass-cache \
				--exclude wp-content/themes/mos/.gitignore \
				--exclude wp-content/themes/mos/.ftppass \
				--exclude wp-content/themes/mos/Gruntfile.js \
				--exclude wp-content/themes/mos/js/vendor \
        ##--exclude wp-content/uploads  ## da valutare se escluderlo
				wp rewrite flush

dbdeploy: ## Invia il db al server e faccio il dump
	wp db export --add-drop-table dump.sql
	rsync -avzh -e $(port) ./dump.sql  $(ssh):$(path)
	ssh $(ssh) $(port-db) "cd $(path); wp db import dump.sql; wp search-replace '$(localpath)' '$(domain)';rm dump.sql"
	rm dump.sql

dbimport: ## Recupera il db dal server e faccio il dump
	ssh $(ssh) $(port-db) "cd $(path); wp db export --add-drop-table dump.sql"
	rsync -avzh -e $(port) $(ssh):$(path)dump.sql ./
	ssh $(ssh) $(port-db) "rm $(path)dump.sql"
	wp db import dump.sql
	wp search-replace '$(domain)' '$(localpath)'
	rm dump.sql

update: ## Aggiorno sia il core che tutti i plugin installati
	wp core update
	wp plugin update --all

updateremote: ## non si connette (verificare i path e rimuovere php visto che l'utente è quasi sempre root)
	$(ssh):$(path)
	php wp-cli.phar core update
	php wp-cli.phar plugin update --all
