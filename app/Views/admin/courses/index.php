


<div class="container" >
  <div class="row">
    <div class="col-md-12 mt-5">

      <div class="card">
        <div class="card-header">
            <h4 >List Of <?= $page_title; ?>  
            <a href=" <?=  base_url ('Admin/Courses/addCourses')?>"  class="text-light"><button  type="button" class="btn btn-primary float-end"> <i class="fas fa-user-plus" ></i> Add <?= $page_title; ?></button></a>
            </h4>
          </div>

        <div class="card-body" >

        <table class="table table-bordered  table-hover ">
          <thead class="table-secondary ">
            <tr >
              <th scope="col">ID</th>
              <th scope="col">Name courses</th>
              <th scope="col">Description</th>
              <th scope="col">Categoryes</th>
              <th scope="col">Language</th>
              <th scope="col">Images</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
            <tbody class="text-center">
            <?php if ($courses!=null) : ?>
              <?php foreach ($courses as $course): ?>
              <tr>
                <td class="pt-4 "scope="row"><?= esc($course['courses_id']) ?></td>
                <td class="pt-4"><?= esc($course['courses_name']) ?></td>
                <td class="pt-4"><?= esc($course['courses_description']) ?></td>
                <td class="pt-4"><?= esc($course['categories_name']) ?></td>
                <td class="pt-4"><?= esc($course['courses_language_code']) ?></td>
                <td class="pt-3 "><img src="<?= base_url('assets/uploads/'.$course['courses_image']); ?>" class="card-img-top"height="50px" width="10px" alt="course"></td>
                    <td>
                    <a href="<?=base_url('Admin/Courses/editting/'.$course['courses_id'])?>"><button type="button" class=" mt-1 btn btnView  btn-md btn-sm btn-lg btn-success"><i class="fas fa-user-edit"></i>Update</button></a>
                      <a href="<?=base_url('Admin/Courses/view/'.$course['courses_id'])?>"><button type="button" class=" mt-1 btn btnView  btn-md btn-sm btn-lg btn-secondary"><i class="fab fa-vine"></i> Viwe</button></a>
                      <a href="<?=base_url('Admin/Courses/delete/'.$course['courses_id'])?>"><button type="button" class="btn mt-1  btn-md btn-sm btn-lg btnDelete btn-danger"><i class="las la-user-minus"></i> Delete</button></a>
                    </td>
              </tr>
          

            <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <th colspan="7"><h3>No <?= $page_title; ?> yet</h3><br><p>Unable to find any <?= $page_title; ?>.</p></th>
              </tr>					
          <?php endif ?>
          </tbody>
        </table>




        </table>
          <div id="Pagination">
            <?= $pager->links() ?>
          </div> 

        </div>
      </div>
    </div>
  </div>
</div>




 