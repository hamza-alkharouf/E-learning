<div class="container">
  <section class="text-center">
    <h1 style="font-size:50px; color:gray;" class="heading"><span style="color: #6A5ACD;">S</span>TAY <span style="color: #6A5ACD;">I</span>NFORMED</h1>

    <hr>
    <p data-aos="flip-right"> Contact with us and ask any question, and following us on social media platforms.</p>
    <hr>

  </section>


  <div class="container my-5 ">
    <div class="row  w-75" style="margin-left: 180px; ">
      <div class="col col-6 border p-5 ">
        <form action="" method="post">
          <div class="form-group mb-3">
            <label for="name">Full NAME</label>
            <input type="text" class="form-control border" id="name" name="fullName" value="<?= set_value('fullName') ?>">
            <div class="text-danger error">
              <?= $validation->getError('fullName') ?>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="email">EMAIL</label>
            <input type="text" class="form-control border" id="email" name="email" value="<?= set_value('email') ?>">
            <div class="text-danger error">
              <?= $validation->getError('email') ?>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="message">MESSAGE</label>
            <textarea class="form-control" id="message" name="message" value="<?= set_value('message') ?>"></textarea>
            <div class="text-danger error">
              <?= $validation->getError('message') ?>
            </div>
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary">SEND MESSAGE</button>
          </div>
        </form>
      </div>
      <div class="col col-4 d-flex justify-content-center " style="color:white ;background: linear-gradient(135deg, #7f279c 0%, #2e279d 100%);">

        <div class="d-flex flex-column bd-highlight d-flex justify-content-center fs-5 mb-3">
          <div class="p-2 bd-highlight">
            <p><span class="fa fa-map-marker"></span><span> Address: </span><?= $contact[0]['Address'] ?></p>
          </div>
          <div class="p-2 bd-highlight">
            <p><span class="fa fa-phone"></span><span> Phone: </span><?= $contact[0]['Phone'] ?></p>
          </div>
          <div class="p-2 bd-highlight">
            <p><span class="fa fa-paper-plane"></span><span> Email: </span><?= $contact[0]['Email'] ?></p>
          </div>
          <div class="p-2 bd-highlight">
            <div class="d-flex align-items-center d-flex justify-content-center">
              <a class="m-2" href="<?= $socialMedia[0]['link'] ?>">
                <p><i class="fab fa-facebook-f"></i></p>
              </a>
              <a class="m-2" href="<?= $socialMedia[1]['link'] ?>">
                <p><i class="fab fa-youtube"></i></p>
              </a>
              <a class="m-2" href="<?= $socialMedia[2]['link'] ?>">
                <p><i class="fab fa-twitter"></i></p>
              </a>

            </div>
          </div>

        </div>







      </div>
    </div>

  </div>
</div>