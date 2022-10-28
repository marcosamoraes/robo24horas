<?php
$data = false;
if( !empty($result) ){
    $data = json_decode($result->data);

    if( !empty($data) && isset($data->rows) && count($data->rows) != 0 ){
        $options = $data->rows;
    }
}

?>

<div class="container p-25">
        <div class="d-flex align-self-center justify-content-center">
            <h5 class="mr-auto p-2 text-primary "><?php _e("Button message template")?></h5>
            <div class="p-2">
                <a class="wa-action-item wa-open-content btn btn-sm btn-info mr-2 wa-back-submenu" data-result-content="wa-content" href="<?php _e( get_module_url("get/template_button_message") )?>"><?php _e("Back")?></a>
            </div>
        </div>
        <div class="wa-list-message my-3">
            <form class="actionForm post-create p-t-10" action="<?php _e( get_module_url("template_button_message_save/". get_data($result, "ids") ) )?>" data-call-after="WhatsappJs.reload_button_template(result);">
                <div class="card mb-4">
                    <div class="card-body">
                        <div><?php _e("Button template name")?></div>
                        <input class="form-control" name="name" required="" placeholder="<?php _e("Enter button template name")?>" value="<?php _e( get_data($result, "name") )?>">

                        <div class="post">
                            <div class="post-content">
                                <?php _e( $block_caption, false)?>
                                <ul class="text-success small m-b-0 m-t-3">
                                    <li><?php _e("[Bulk messaging] - Add custom variables: %name%, %param1%, %param2%,...")?></li>
                                    <li><?php _e("Random message by Spintax")?></li>
                                    <li><?php _e("Ex: {Hi|Hello|Hola}")?></li>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-3">
                        <?php _e( $file_manager, false) ?>
                        </div>

                        <div class="mt-3"><?php _e("Footer description")?></div>
                        <input class="form-control" name="footer_desc" placeholder="<?php _e("Enter footer description")?>" value="<?php _e( get_data($data, "footer") )?>">
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush bg-soild-danger wa-lm-list-option">
                            <li class="list-group-item px-0 border-none fw-6 p-15">
                                <?php _e("List button")?>
                            </li>

                            <?php
                            $options = [];

                            if( !empty($result) ){
                                $data = json_decode($result->data);
                                if( !empty($data) && isset($data->templateButtons) && count($data->templateButtons) != 0 ){
                                    $options = $data->templateButtons;
                                }
                            }
                            ?>

                            <?php if(!empty($options)){?>

                                <?php foreach ($options as $key => $value): 
                                    $displayText = "";
                                    if( isset( $value->quickReplyButton ) ){
                                        $displayText = $value->quickReplyButton->displayText;
                                    }else if( isset( $value->urlButton ) ){
                                        $displayText = $value->urlButton->displayText;
                                    }else if( isset( $value->callButton ) ){
                                        $displayText = $value->callButton->displayText;
                                    }
                                ?>
                                <li class="list-group-item px-3 post btn-msg-item">
                                    <div class="text-right m-b-10">
                                        <button type="button" class="btn btn-sm btn-label-danger wa-lm-list-message-remove"><i class="ri-delete-bin-6-line"></i></button>
                                    </div>

                                    <nav class="mt-3">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <label for="btn_type_text_<?php _e( $key )?>" class="nav-item nav-link radio-tab <?php _e( get_data($value, "quickReplyButton") != false?"active text-primary":"" ) ?>" data-toggle="tab" href="#nav_btn_type_text_<?php _e( $key )?>" role="tab">
                                                <input class="d-none" type="radio" name="btn_msg_type[<?php _e( $key )?>]" id="btn_type_text_<?php _e( $key )?>" <?php _e( get_data($value, "quickReplyButton") != false?'checked="true"':"" ) ?> value="1">
                                                <?php _e("Text Button")?>
                                            </label> 
                                            <label for="btn_type_link_<?php _e( $key )?>" class="nav-item nav-link radio-tab <?php _e( get_data($value, "urlButton") != false?"active text-primary":"" ) ?>" data-toggle="tab" href="#nav_btn_type_link_<?php _e( $key )?>" role="tab">
                                                <input class="d-none" type="radio" name="btn_msg_type[<?php _e( $key )?>]" id="btn_type_link_<?php _e( $key )?>" <?php _e( get_data($value, "urlButton") != false?'checked="true"':"" ) ?> value="2">
                                                <?php _e("Link Button")?>
                                            </label>
                                            <label for="btn_type_call_<?php _e( $key )?>" class="nav-item nav-link radio-tab <?php _e( get_data($value, "callButton") != false?"active text-primary":"" ) ?>" data-toggle="tab" href="#nav_btn_type_call_<?php _e( $key )?>" role="tab">
                                                <input class="d-none" type="radio" name="btn_msg_type[<?php _e( $key )?>]" id="btn_type_call_<?php _e( $key )?>" <?php _e( get_data($value, "callButton") != false?'checked="true"':"" ) ?> value="3">
                                                <?php _e("Call Action Button")?>
                                            </label>
                                        </div>
                                    </nav>

                                    <div class="tab-content pt-3" id="nav-tabContent">
                                        <div class="post">
                                            <div class="post-content">
                                                <div class="form-group">
                                                    <label><?php _e("Display text")?></label> 
                                                    <textarea name="btn_msg_display_text[<?php _e( $key )?>]" class="form-control btn_msg_display_text_<?php _e( $key )?>" placeholder="Enter your caption"><?php _e( $displayText ) ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php _e( get_data($value, "quickReplyButton") != false?"show active":"" ) ?>" id="nav_btn_type_text_<?php _e( $key )?>" role="tabpanel"></div>
                                        <div class="tab-pane fade <?php _e( get_data($value, "urlButton") != false?"show active":"" ) ?>" id="nav_btn_type_link_<?php _e( $key )?>" role="tabpanel">
                                            <div class="post">
                                                <div class="post-content">
                                                    <div class="form-group">
                                                        <label><?php _e("Link")?></label> 
                                                        <input class="form-control" name="btn_msg_link[<?php _e( $key )?>]" placeholder="<?php _e("Enter your url")?>" value="<?php _e( get_data($value, "urlButton") != false?get_data($value->urlButton, "url"):"" ) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php _e( get_data($value, "callButton") != false?"show active":"" ) ?>" id="nav_btn_type_call_<?php _e( $key )?>" role="tabpanel">
                                            <div class="post">
                                                <div class="post-content">
                                                    <div class="form-group">
                                                        <label><?php _e("Phone number")?></label> 
                                                        <input class="form-control" name="btn_msg_call[<?php _e( $key )?>]" placeholder="<?php _e("Ex: +1 (234) 5678-901")?>" value="<?php _e( get_data($value, "callButton") != false?get_data($value->callButton, "phoneNumber"):"" ) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="text-success small m-b-0 m-t-3">
                                        <li><?php _e("Random message by Spintax. Ex: {Hi|Hello|Hola}")?></li>
                                        <li><?php _e("CallButton: Enter Phone number for the button")?></li>
                                        <li><?php _e("UrlButton: Enter URL for the button")?></li>
                                        <li><?php _e("quickReplyButton: Enter a message to quick reply for the button")?></li>
                                        <li><?php _e("[Bulk messaging] - Add custom variables: %name%, %param1%, %param2%,...")?></li>
                                    </ul>
                                </li>
                                <?php endforeach ?>

                            <?php }else{?>
                            <li class="list-group-item px-3 post wa-lm-empty">
                                <div class="empty p-t-30">
                                    <div class="icon"></div>
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                        <div class="p-t-15 p-b-15 btn-msg-add">
                            <a href="javascript:void(0);" class="card-link px-3 btn-wa-add-option"><?php _e("Add new option")?></a>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 mb-3"><?php _e("Submit")?></button>
            </form>
        </div>
    </div>
</div>

<div class="wa-lm-data-option d-none">
    <li class="list-group-item px-3 post btn-msg-item">
        <div class="text-right m-b-10">
            <button type="button" class="btn btn-sm btn-label-danger wa-lm-list-message-remove"><i class="ri-delete-bin-6-line"></i></button>
        </div>

        <nav class="mt-3">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <label for="btn_type_text_{count}" class="nav-item nav-link radio-tab active text-primary" data-toggle="tab" href="#nav_btn_type_text_{count}" role="tab">
                    <input class="d-none" type="radio" name="btn_msg_type[{count}]" id="btn_type_text_{count}" checked="true" value="1">
                    <?php _e("Text Button")?>
                </label> 
                <label for="btn_type_link_{count}" class="nav-item nav-link radio-tab" data-toggle="tab" href="#nav_btn_type_link_{count}" role="tab">
                    <input class="d-none" type="radio" name="btn_msg_type[{count}]" id="btn_type_link_{count}" value="2">
                    <?php _e("Link Button")?>
                </label>
                <label for="btn_type_call_{count}" class="nav-item nav-link radio-tab" data-toggle="tab" href="#nav_btn_type_call_{count}" role="tab">
                    <input class="d-none" type="radio" name="btn_msg_type[{count}]" id="btn_type_call_{count}" value="3">
                    <?php _e("Call Action Button")?>
                </label>
            </div>
        </nav>

        <div class="tab-content pt-3" id="nav-tabContent">
            <div class="post">
                <div class="post-content">
                    <div class="form-group">
                        <label><?php _e("Display text")?></label> 
                        <textarea name="btn_msg_display_text[{count}]" class="form-control btn_msg_display_text_{count}" placeholder="Enter your caption"></textarea>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav_btn_type_text_{count}" role="tabpanel"></div>
            <div class="tab-pane fade" id="nav_btn_type_link_{count}" role="tabpanel">
                <div class="post">
                    <div class="post-content">
                        <div class="form-group">
                            <label><?php _e("Link")?></label> 
                            <input class="form-control" name="btn_msg_link[{count}]" placeholder="<?php _e("Enter your url")?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav_btn_type_call_{count}" role="tabpanel">
                <div class="post">
                    <div class="post-content">
                        <div class="form-group">
                            <label><?php _e("Phone number")?></label> 
                            <input class="form-control" name="btn_msg_call[{count}]" placeholder="<?php _e("Ex: +1 (234) 5678-901")?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="text-success small m-b-0 m-t-3">
            <li><?php _e("Random message by Spintax. Ex: {Hi|Hello|Hola}")?></li>
            <li><?php _e("CallButton: Enter Phone number for the button")?></li>
            <li><?php _e("UrlButton: Enter URL for the button")?></li>
            <li><?php _e("quickReplyButton: Enter a message to quick reply for the button")?></li>
            <li><?php _e("[Bulk messaging] - Add custom variables: %name%, %param1%, %param2%,...")?></li>
        </ul>
    </li>
</div>

<?php if($result){?>
    <script type="text/javascript">
        
        var post_data = <?php _e( $result->data )?>;

        $(function(){

            setTimeout(function(){
                if( post_data.text != undefined ){
                    var el = $("textarea[name=caption]").emojioneArea();
                    el[0].emojioneArea.setText(post_data.text);
                }else if( post_data.image != undefined && post_data.image.url != undefined ){
                    var el = $("textarea[name=caption]").emojioneArea();
                    el[0].emojioneArea.setText(post_data.caption);
                    File_Manager.addFile(post_data.image.url, post_data.image.url);
                }
            }, 1000);

        });

    </script>
<?php }?>