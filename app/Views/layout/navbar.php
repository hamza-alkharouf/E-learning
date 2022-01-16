<nav class="menu">


<ul>
<li> 
  <img style="width:40px;height:50px;"src="<?= base_url('assets/adminImage/'.$iconWebSite)?>" class="d-block w-100" alt="..."></li>

  <li><a href="<?=base_url('/')?>">Home</a></li>
<li><a href="<?=base_url('About')?>">About</a></li>
  <li><a href="<?=base_url('categories')?>">Categories</a></li>
  <li><a href="<?=base_url('ContactUs')?>">Contact</a></li>


  <?php if (!session()->get('loginStudant')) { ?>
  <li><a href="/Users/login">Login</a></li>
  <?php  } else { ?>
  <li><a href="<?= base_url('Users/logout');?>" >Logout</a></li>
  <?php } ?>

</ul>
    <form class="search-form" action="<?=site_url('Home/search')?>">
      <input name="search" type="text" placeholder="search"
      
      aria-describedby="search"aria-label="Search" >
      <button> search</button>
    </form>
  </nav>

  