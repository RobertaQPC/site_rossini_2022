<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
    <div class="input-wrap search">
        <input type="search" placeholder="<?php echo esc_attr_x( 'Cerca &hellip;', 'placeholder', 'mos' ); ?>" value="<?php echo get_search_query(); ?>" id="input-s" name="s" />
        <i class="fa fa-search" aria-hidden="true"></i>
        <div class="input-wrap submit">
            <input type="submit" value="cerca" class="button" />
      </div>
    </div>
</form>
