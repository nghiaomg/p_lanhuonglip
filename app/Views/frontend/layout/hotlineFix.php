<?php // if($data_index['checkScreen'] == 'destop'){ ?>
  <div class="contact_fix">
    <ul>
        <li class="zalo"><a href="https://zalo.me/<?=str_replace(' ', '',$data_index['systems']['contact']['zalo']) ?>" target="_blank"><img src="assets/images/icons/ic-zalo.png" alt="zalo" width="45" height="45" /></a></li>
        <li class="messenger"><a href="https://m.me/<?=$data_index['systems']['contact']['messenger'] ?>" target="_blank"><img src="assets/images/icons/messenger-icon.png" alt="messenger" width="25" height="25" /></a></li>
        <li class="phone"><a href="tel:<?=$data_index['systems']['contact']['phone'] ?>"><img src="assets/images/icons/call.png" alt="Phone" width="25" height="25" /></a></li>
    </ul>
  </div>
<?php // } ?>
<style type="text/css">
  .contact_fix{
    position: fixed;
    text-align: center;
    width: 45px;
    bottom: 150px;
    right: 20px;
    z-index: 99999;
  }
  .contact_fix ul{
    list-style: none;
    padding: 0px;
    margin: 0px;
  }
  .contact_fix ul li{
    border-radius: 100%;
    box-shadow: 0 3px 10px #888;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 45px;
    height: 45px;
  }
  .contact_fix ul li.phone{
    background: #4bd963;
  }
  .contact_fix ul li.messenger{
    background: #0572d8;
    margin: 14px 0;
  }
  .contact_fix ul li a img{
    vertical-align: middle;
  }
</style>