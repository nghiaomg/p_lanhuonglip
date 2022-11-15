<!-- Datepicker css -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<link rel="stylesheet" href="assets/css/loading.css">
<div class="bookingForm" id="bookingForm">
    <div class="box">
        <?php /* <a href="javascript:void(0)" class="btnClose"><i class="fas fa-times"></i></a> */?>
        <div class="contents">
            <p><?= $data_index['getkeys']['bookingFrom_Title'] ?>:</p>
            <form action="booking.html" method="POST">
                <div class="item_group">
                    <div class="item">
                        <label><?= $data_index['getkeys']['bookingFrom_labelName'] ?> <span>*<span></label>
                        <input type="text" name="data_post[name]" placeholder="<?= $data_index['getkeys']['bookingFrom_placeholderName'] ?>" class="text" />
                        <small></small>
                    </div>
                    <div class="item">
                        <label><?= $data_index['getkeys']['bookingFrom_labelPhone'] ?> <span>*<span></label>
                        <input type="text" name="data_post[phone]" placeholder="<?= $data_index['getkeys']['bookingFrom_placeholderPhone'] ?>" class="text" />
                        <small></small>
                    </div>
                </div>
                <div class="item_group">
                    <div class="item">
                        <label>Email <span>*<span></label>
                        <input type="text" name="data_post[email]" placeholder="<?= $data_index['getkeys']['bookingFrom_placeholderEmail'] ?>" class="text" />
                        <small></small>
                    </div>
                    <div class="item">
                        <label><?= $data_index['getkeys']['bookingFrom_labelGender'] ?></label>
                        <div class="clear"></div>
                        <div class="radioGroup">
                            <div class="radio">
                                <input id="radio-male" name="data_post[gender]" class="radioInput" checked name="radio" type="radio" value="1" checked>
                                <label for="radio-male" class="radio-label"><?= $data_index['getkeys']['bookingFrom_labelMale'] ?></label>
                            </div>
                            <div class="radio">
                                <input id="radio-female" name="data_post[gender]" class="radioInput" name="radio" type="radio" value="2">
                                <label for="radio-female" class="radio-label"><?= $data_index['getkeys']['bookingFrom_labelFemale'] ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item_group">
                    <div class="item">
                        <label><?= $data_index['getkeys']['bookingFrom_labelBirth'] ?> <span>*<span></label>
                        <input type="text"  name="data_post[birthday]" placeholder="<?= $data_index['getkeys']['bookingFrom_placeholderBirth'] ?>" class="text" id="birthday"  data-inputmask="'alias': 'date'"/>
                        <small></small>
                    </div>
                    <div class="item">
                        <label><?= $data_index['getkeys']['bookingFrom_labelNational'] ?><span>*<span></label>
                        <select name="data_post[countryID]">
                            <option value=""><?= $data_index['getkeys']['bookingFrom_SelectNational'] ?></value>
                            <?php if(isset($country) && $country != NULL){?>
                                <?php foreach($country as $key => $val){?>
                                    <option value="<?= $val['id'] ?>"><?= $val['name'] ?></value>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <small></small>
                    </div>
                </div>
                <div class="item_group">
                    <div class="item w100">
                        <label><?= $data_index['getkeys']['bookingFrom_labelAddress'] ?> <span>*<span></label>
                        <input type="text" name="data_post[address]" placeholder="<?= $data_index['getkeys']['bookingFrom_placeholderAddress'] ?>" class="text" />
                        <small></small>
                    </div>
                </div>
                <div class="item_group">
                    <?php /*<div class="item">
                        <label><?= $data_index['getkeys']['bookingFrom_labelArdate'] ?> <span>*<span></label>
                        <input type="text" name="data_post[arrivalDate]" placeholder="Chọn ngày đến..." class="text" />
                        <small></small>
                    </div> */?>
                    <div class="item">
                        <label><?= $data_index['getkeys']['bookingFrom_labelDaygo'] ?> <span>*<span></label>
                        <input type="text" name="data_post[dateGo]" placeholder="Chọn ngày đi..." class="text" />
                        <small></small>
                    </div>
                    <div class="item">
                        <label><?= $data_index['getkeys']['bookingFrom_labelClub'] ?></label>
                        <input type="text" name="data_post[club]"  placeholder="<?= $data_index['getkeys']['bookingFrom_placeholderClub'] ?>" class="text datepicker" />
                    </div>
                </div>
                
                <?php /*<div class="item_group">
                    <div class="item w60">
                        <label><?= $data_index['getkeys']['bookingFrom_labelGowith'] ?></label>
                        <div class="clear"></div>
                        <div class="radioGroup">
                            <div class="radio">
                                <input id="radio-type-1" name="data_post[goWith]" class="radioInput" name="radio" type="radio" value="1" checked>
                                <label for="radio-type-1" class="radio-label"><?= $data_index['getkeys']['bookingFrom_labelAlone'] ?></label>
                            </div>
                            <div class="radio">
                                <input id="radio-type-2" name="data_post[goWith]" class="radioInput" name="radio" type="radio" value="2">
                                <label for="radio-type-2" class="radio-label"><?= $data_index['getkeys']['bookingFrom_labelGroup'] ?></label>
                            </div>
                        </div>
                    </div>
                </div> */?>
                <div class="item_group">
                    <div class="item w100">
                        <p>Đăng Ký theo nhóm: Anh/ Chị vui lòng <strong><a href="uploads/files/form_thong_tin.xlsx">tải form mẫu</a></strong> và điền đầy đủ thông tin của tất cả thành viên tham gia. Sau đó gửi về mail <strong><?= $data_index['systems']['contact']['email'] ?></strong>. Xin cảm ơn!</p>
                    </div>
                </div>
                <div class="itemBtn">
                    <button type="submit" id="order"><?= $data_index['getkeys']['bookingFrom_ButtonBooking'] ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- loading animation -->
<div class="overlay_export"></div>
<div class="loading">
    <span style="--i:1"></span>
    <span style="--i:2"></span>
    <span style="--i:3"></span>
    <span style="--i:4"></span>
    <span style="--i:5"></span>
    <span style="--i:6"></span>
    <span style="--i:7"></span>
    <span style="--i:8"></span>
    <span style="--i:9"></span>
    <span style="--i:10"></span>
    <span style="--i:11"></span>
    <span style="--i:12"></span>
    <span style="--i:13"></span>
    <span style="--i:14"></span>
    <span style="--i:15"></span>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $("#birthday").inputmask();
    $('.bookingBtn').click(function(){
        $('#bookingForm').show();
        $('#bookingForm .box').show();
    });
    $('.btnClose').click(function(){
        $('#bookingForm').hide();
        $('#bookingForm .box').hide();
    });
    $(document).ready(function(){
        // $('#bookingForm').hide();
        $('#person').hide();
        $('input[name="data_post[goWith]"]').change(function(){
            let value = $(this).is(':checked');
            if ($(this).val() === "1")
            {
                $('#person').hide();
            }
            else
            {
                $('#person').show();
            }
        });
        $('#order').click(async function(e){
            e.preventDefault();
            let checked = true;
            let today = new Date();
            today.setHours(0);
            today.setMinutes(0);
            today.setSeconds(0);
            today.setMilliseconds(0);
            today = today.getTime();
            let formArray = $(this).closest('form').serializeArray();
            for (let index = 0; index < formArray.length; index++)
            {
                if (formArray[index].name !== 'data_post[numPerson]' && formArray[index].name !== 'data_post[goWith]'
                && formArray[index].name !== 'data_post[club]') {
                    if (formArray[index].value === "")
                    {
                       checked = false;
                       $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').text("<?= $data_index['getkeys']['bookingFrom_IsRequired'] ?>"); 
                       $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').css('color','red'); 
                        //    
                        $('select[name="'+formArray[index].name+'"]').closest('.item').find('small').text("<?= $data_index['getkeys']['bookingFrom_IsRequired'] ?>"); 
                        $('select[name="'+formArray[index].name+'"]').closest('.item').find('small').css('color','red'); 
                    }
                    else
                    {
                        $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').text(''); 
                        $('select[name="'+formArray[index].name+'"]').closest('.item').find('small').text('');
                        // phone
                        if (formArray[index].name === 'data_post[phone]')
                        {
                            if ((/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/).test(formArray[index].value) === false)
                            {
                                $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').text("<?= $data_index['getkeys']['bookingFrom_IsNumFormat'] ?>");
                                $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').css('color','red');
                                checked =  false;
                            }	    
                        } 
                        // email
                        if (formArray[index].name ==="data_post[email]")
                        {
                            if ((/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(formArray[index].value) === false)
                            {
                                $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').text("<?= $data_index['getkeys']['bookingFrom_FormatEmail'] ?>");
                                $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').css('color','red');
                                checked =  false;
                            }	
                        }
                        // check ngày đến nhỏ hơn ngày đi
                        // ngày đi và ngày đến đều phải lớn hơn ngày hiện tại
                        // ngày đến
                        // var  arrivalDate;
                        // var  goDate;
                        // if (formArray[index].name ==="data_post[arrivalDate]")
                        // {
                          
                        //     arrivalDate = await converTimeArrival(formArray[index].value);

                        //     if (arrivalDate < today)
                        //     {
                        //         $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').text("<?= $data_index['getkeys']['bookingFrom_LessDateNow'] ?>");
                        //         $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').css('color','red');
                        //         checked =  false;
                        //     }
                        //     else{
                        //         $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').text('');
                        //     }
                        // }
                        // // ngày đi
                        // if (formArray[index].name ==="data_post[dateGo]")
                        // {
                          
                        //     goDate = await converTimeArrival(formArray[index].value);

                        //     if (goDate < today)
                        //     {
                        //         $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').text("<?= $data_index['getkeys']['bookingFrom_LessDateNow'] ?>");
                        //         $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').css('color','red');
                        //         checked =  false;
                        //     }
                        //     else{
                        //         $('input[name="'+formArray[index].name+'"]').closest('.item').find('small').text('');
                        //     }
                        // }

                        // if (goDate > today && arrivalDate > today) {
                        //     if (goDate < arrivalDate)
                        //     {
                        //         $('input[name="data_post[dateGo]"]').closest('.item').find('small').text("<?= $data_index['getkeys']['bookingFrom_LessArrivalDate'] ?>");
                        //         $('input[name="data_post[dateGo]"]').closest('.item').find('small').css('color','red');
                        //         checked =  false;
                        //     }
                        //     else
                        //     {
                        //         $('input[name="data_post[dateGo]"]').closest('.item').find('small').text('');
                        //     }
                        // }
                       
                    }
                }    
            }
            if (checked === true)
            {
                document.querySelector('.loading').style.display = "unset";
            	document.querySelector('.overlay_export').style.display = "unset";
            	document.querySelector('#order').disabled = true;
                $(this).closest('form').unbind();
                $(this).closest('form').submit();
            }
        });
    });
    function converTimeArrival(time)
    {
        return new Promise((relove,reject)=>{
            let times = time.split('/');
            let timeArrival = new Date(times[2] +'-'+times[1]+'-'+times[0]).getTime();
            relove(timeArrival)
        });
    }
    // data picker
    $(function () {
        // $('input[name="data_post[arrivalDate]"]').daterangepicker({
        //     timePicker: false,
        //     // singleDatePicker: true,
        //     locale: {
        //         format: 'DD/MM/YYYY'
        //     }
        // });
        $('input[name="data_post[dateGo]"]').daterangepicker({
            timePicker: false,
            // singleDatePicker: true,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
    });
</script>