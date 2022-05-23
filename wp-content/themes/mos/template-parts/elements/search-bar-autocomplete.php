<div class="wrap-autocomplete">
  <div class="container">
    <form role="search" method="get" id="searchform" action="<?php echo site_url('/'); ?>">
      <input type="hidden" name="post_type" value="viaggio" />
      <input type="hidden" name="taxonomy" value="destinazioni" />
      <input type="hidden" name="destinazioni" value="" id="destinazione_slug" />
      <div class="row">
        <div class="col-lg-7">
          <input class="input-autocomplete" id="tags" placeholder="Dove vuoi andare in vacanza?" name="s">
        </div>
        <div class="col-lg-3">
          <input class="input-datepicker" type="text" id="datepicker" placeholder="Quando?" name="date">
        </div>
        <div class="col-lg-2">
          <input value="CERCA" class="wpcf7-form-control wpcf7-submit btn btn-filtra" type="submit">
        </div>
      </div>
    </form>
  </div>
</div>
