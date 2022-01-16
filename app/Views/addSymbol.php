<div class="container" style="margin-bottom: 20%;">
  <div class="row">
  <dev class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 shadow p-3 mb-5 mb-5  ">  
    <div class="container user">
    <br>
        <h5 class="text-center"><?= $page_title; ?></h5>
        <br>
        <div class="text-center col-12">
    <img src="<?= base_url('assets/images/symbol.png')?>" height="200px" width="300px" class="rounded" alt="...">
  </div>
  <hr>
        <form action="<?php base_url('Users/checksymbol')?>" method="POST">

      <div class="form-group mb-3">
          <label for="inputEmail1">Symbol </label>
          <input type="text" max="6" class="form-control" name="symbol" id="symbol" value="<?= set_value('symbol') ?>" aria-describedby="symbol" placeholder="enter symbol">
          <div class="text-danger error">
            <?=$validation->getError('symbol') ?>
          </div>
        </div>
        <div class="row">
        <div class="d-grid gap-2 mb-3 col-6 mx-auto">
        <button  class="button btn " ><?= $page_title; ?></button>
        </div>
        </div>
        </form>
      </div>
    </dev>  
  </div>
</div>


