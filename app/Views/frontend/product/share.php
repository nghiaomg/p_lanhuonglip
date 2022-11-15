<!-- Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md share_section" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5>Chia sẽ tin này với bạn bè</h5>
        <div class="share_link">
          <div class="boxLink" id="myTextLink"><?= base_url().'/'.$dataRow['alias']?></div>
          <button id="btnCopyLink" data-clipboard-action="copy" data-clipboard-target="#myTextLink">Sao chép link</button>
        </div>
        <div class="share_social clearfix">
          <a href="https://facebook.com/sharer/sharer.php?u=<?=urlencode(base_url().'/'.$dataRow['alias'])?>" target="_blank" class="facebook"> Chia sẽ qua Facebook</a>
          <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize="false"> Chia sẽ qua Zalo</div>
          <!-- <a href="" class="zalo">Chia sẽ qua Zalo</a> -->
          <script src="https://sp.zalo.me/plugins/sdk.js"></script>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/clipboard.js/clipboard.min.js"></script>
<script>
    var clipboardReferal = new ClipboardJS('#btnCopyLink');
    clipboardReferal.on('success', function(e) {
        console.log(e);
    });
    clipboardReferal.on('error', function(e) {
        console.log(e);
    });
</script>
<style type="text/css">
    .modal-dialog.share_section {
        max-width: 500px !important;
    }
    .share_link{
        width: 100%;
        display: inline-flex;
        justify-content: space-between;
        margin: 0.5rem 0;
        background-color: #F7F7F7;
        border-radius: 3px;
        padding: 6px 10px;
    }
    .share_link .boxLink{
        width: 70%;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1; /* number of lines to show */
        -webkit-box-orient: vertical;
    }
    .share_link button{
        width: 28%;
        background: transparent;
        border: none;
        outline: none;
        color: #4154BE;
        cursor: pointer;
    }
    .share_social{
        width: 100%;
        display: inline-flex;
        justify-content: space-between;
    }
    .share_social a{
        float: left;
        width: 50%;
        background-color: #F1F9FB;
        color: #333;
        padding: 5px 0px 5px 35px;
        border-radius: 3px;
        background-size: 20px;
        background-position: 10px 5px;
        background-repeat: no-repeat;
    }
    .zalo-share-button{
        float: left;
        width: 49% !important;
        height: 32px !important;
        background-color: #F1F9FB;
        color: #333;
        background-image: url(assets/images/ic_zalo.png);
        padding: 5px 0px 5px 35px;
        border-radius: 3px;
        background-size: 20px;
        background-position: 10px 5px;
        background-repeat: no-repeat;
        cursor: pointer;
    }
    .zalo-share-button iframe{
        display: none !important;
    }
    .share_social a.facebook{
        background-image: url(assets/images/ic_facebook.png);
    }
</style>