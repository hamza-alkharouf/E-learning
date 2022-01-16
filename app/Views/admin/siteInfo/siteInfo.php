

<?php echo link_tag('add.ico', 'shortcut icon', 'image/ico'); ?>

<div class="cintainer">


    <div class="row d-flex justify-content-around">

        <div class="col-4">
            <form  method="post" action="<?=site_url('/Admin/SiteInfo/editSiteinfoIcon/'.$logoWebSite['id'])?>" enctype='multipart/form-data'>
                <div class="d-grid gap-3">
                    <div class="p-2 bg-light border">
                    <img class="card-img-top" src="<?=base_url('assets/adminImage/'.$logoWebSite['image']);?>"height='300px 'width='150px' alt='course'>

                    </div>
                    <div class="p-2 bg-light border">
                        <div class="form-group text-center">
                            <label class="form-label" for="customFile">edit icon of webSite(side title Page)</label>
                            <input required type="file" class="form-control"value="<?= set_value('image') ?>"aria-describedby="image"name="image" id="customFile" />
                            <div class="text-danger error">
                                <?=$validation->getError('image') ?>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button  class="btn btn-primary" >upload</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-4">
            <form  method="post" action="<?=site_url('/Admin/SiteInfo/editSiteinfoIcon/'.$iconWebSite['id'])?>" enctype='multipart/form-data'>
                <div class="d-grid gap-3">
                    <div class="p-2 bg-light border">
                    <img class="card-img-top" src="<?=base_url('assets/adminImage/'.$iconWebSite['image']);?>"height='300px 'width='150px' alt='course'>

                    </div>
                    <div class="p-2 bg-light border">
                        <div class="form-group text-center">
                            <label class="form-label " for="customFile">edit icon of webSite</label>
                            <input required type="file" class="form-control"value="<?= set_value('image') ?>"aria-describedby="image"name="image" id="customFile" />
                            <div class="text-danger error">
                                <?=$validation->getError('image') ?>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button  class="btn btn-primary" >upload</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>