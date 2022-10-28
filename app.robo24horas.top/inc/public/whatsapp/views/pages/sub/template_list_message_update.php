<?php
$data = false;
$sections = false;
if( !empty($result) ){
    $data = json_decode($result->data);

    if( !empty($data) && isset($data->sections) && count($data->sections) != 0 ){
        $sections = $data->sections;
    }
}

?>

<div class="container p-25">
        <div class="d-flex align-self-center justify-content-center">
            <h5 class="mr-auto p-2 text-primary "><?php _e("Section")?></h5>
            <div class="p-2">
                <a class="wa-action-item wa-open-content btn btn-sm btn-info mr-2 wa-back-submenu" data-result-content="wa-content" href="<?php _e( get_module_url("get/template_list_message") )?>"><?php _e("Back")?></a>
            </div>
        </div>
        <div class="wa-list-message my-3">
            <form class="actionForm post-create p-t-10 m-b-30" action="<?php _e( get_module_url("template_list_message_save/". get_data($result, "ids") ) )?>" data-call-after="WhatsappJs.reload_list_template(result);">

                <div class="card mb-4">
                    <div class="card-body">
                        <div><?php _e("List message template name")?></div>
                        <input class="form-control" name="name" required="" placeholder="<?php _e("Enter list message template name")?>" value="<?php _e( get_data($result, "name") )?>">

                        <div class="mt-3"><?php _e("Menu title")?></div>
                        <input class="form-control" name="title" placeholder="<?php _e("Enter menu title")?>" value="<?php _e( get_data($data, "footer") )?>">

                        <div class="mt-3"><?php _e("Menu description")?></div>
                        <nav class="mt-1">
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
                        </nav>

                        <div class="mt-3"><?php _e("Footer description")?></div>
                        <input class="form-control" name="footer_desc" placeholder="<?php _e("Enter footer description")?>" value="<?php _e( get_data($data, "footer") )?>">

                        <div class="mt-3"><?php _e("Button text")?></div>
                        <input class="form-control" name="button_text" placeholder="<?php _e("Enter button text")?>" value="<?php _e( get_data($data, "buttonText") )?>">
                    </div>
                </div>

                <?php if ($sections): ?>
                    
                    <?php foreach ($sections as $key => $section): ?>
                        
                        <div class="card wa-lm-item mt-3" data-count="<?php _e($key)?>">
                            <div class="card-body p-0">
                                <div class="card-title p-15">
                                    <div class="text-right m-b-10">
                                        <button type="button" class="btn btn-sm btn-label-danger wa-remove" data-remove="wa-lm-item"><i class="ri-close-line"></i></button>
                                    </div>
                                    <div><?php _e("Section name")?></div>
                                    <input class="form-control" name="section_name[<?php _e($key)?>]" required="" placeholder="<?php _e("Enter section name")?>" value="<?php _e( $section->title )?>">
                                </div>
                                <ul class="list-group list-group-flush bg-soild-danger wa-lm-list-option">
                                    <li class="list-group-item px-0 border-none fw-6 p-20 text-success">
                                        <?php _e("List option")?>
                                    </li>
                                    

                                    <?php 
                                        $options = false;
                                        if( !empty($section) ){
                                            if( !empty($section) && isset($section->rows) && count($section->rows) != 0 ){
                                                $options = $section->rows;
                                            }
                                        }
                                    ?>

                                    <?php if (!$options): ?>
                                    <li class="list-group-item px-3 post wa-lm-empty">
                                        <div class="empty p-t-30">
                                            <div class="icon"></div>
                                        </div>
                                    </li>
                                    <?php endif ?>

                                    <?php foreach ($options as $option_key => $option): ?>
                                        <li class="list-group-item px-3 post">
                                            <div class="text-right m-b-10">
                                                <button type="button" class="btn btn-sm btn-label-danger wa-lm-list-message-remove"><i class="ri-delete-bin-6-line"></i></button>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="options[<?php _e($key)?>][name][]" required="" placeholder="<?php _e("Option name")?>" value="<?php _e( $option->title )?>">
                                            </div>
                                            <div class="post">
                                                <div class="post-content">
                                                    <div class="form-group">
                                                        <input class="form-control" name="options[<?php _e($key)?>][desc][]" required="" placeholder="<?php _e("Option description")?>" value="<?php _e( $option->description )?>">
                                                    </div>
                                                    <ul class="text-success small m-b-0 m-t-3">
                                                        <li><?php _e("Random message by Spintax")?></li>
                                                        <li><?php _e("Ex: {Hi|Hello|Hola}")?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                                <p class="card-text">
                                    
                                </p>
                                <a href="javascript:void(0);" class="card-link px-3 btn-wa-add-list-option pb-3 d-block"><?php _e("Add new option")?></a>
                            </div>
                        </div>

                    <?php endforeach ?>

                <?php endif ?>
 
                <div class="p-b-30">
                    <button type="button" class="btn btn-secondary mt-3 btn-wa-add-section"><?php _e("Add new section")?></button>
                    <button type="submit" class="btn btn-primary mt-3 "><?php _e("Submit")?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="wa-lm-data-option d-none">
    <li class="list-group-item px-3 post">
        <div class="text-right m-b-10">
            <button type="button" class="btn btn-sm btn-label-danger wa-lm-list-message-remove"><i class="ri-delete-bin-6-line"></i></button>
        </div>
        <div class="form-group">
            <input class="form-control" name="options[{count}][name][]" required="" placeholder="<?php _e("Option name")?>" >
        </div>
        <div class="post">
            <div class="post-content">
                <div class="form-group">
                    <input class="form-control" name="options[{count}][desc][]" required="" placeholder="<?php _e("Option description")?>">
                </div>
                <ul class="text-success small m-b-0 m-t-3">
                    <li><?php _e("Random message by Spintax")?></li>
                    <li><?php _e("Ex: {Hi|Hello|Hola}")?></li>
                </ul>
            </div>
        </div>
    </li>
</div>

<div class="wa-lm-data-section d-none">
    <div class="card wa-lm-item mt-3" data-count="{count}">
        <div class="card-body p-0">
            <div class="card-title p-20">
                <div><?php _e("Section name")?></div>
                <input class="form-control" name="section_name[{count}]" required="" placeholder="<?php _e("Enter section name")?>" value="">
            </div>
            <ul class="list-group list-group-flush bg-soild-danger wa-lm-list-option">
                <li class="list-group-item px-0 border-none fw-6 p-20 text-success">
                    <?php _e("List option")?>
                </li>
                <li class="list-group-item px-3 post wa-lm-empty">
                    <div class="empty p-t-30">
                        <div class="icon"></div>
                    </div>
                </li>
            </ul>
            <p class="card-text">

            </p>
            <a href="javascript:void(0);" class="card-link px-3 btn-wa-add-list-option pb-3 d-block"><?php _e("Add new option")?></a>
        </div>
    </div>
</div>

<?php if($data){?>
    <script type="text/javascript">
        
        var post_data = <?php _e( json_encode($data) )?>;

        $(function(){

            setTimeout(function(){
                var el = $("textarea[name=caption]").emojioneArea();
                el[0].emojioneArea.setText(post_data.text);
            }, 1000);

        });

    </script>
<?php }?>