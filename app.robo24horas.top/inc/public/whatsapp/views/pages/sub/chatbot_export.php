<!-- Start chats tab-pane -->
<div class="tab-pane h-100 show active wa-chatbot" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
  <div class="px-4 pt-4">
    <h4 class="mb-4">Export <?php _e('Chatbot') ?>
    </h4>
    <div class="search-box chat-search-box">
      <div class="input-group mb-3 rounded-3">
        <span class="input-group-text text-muted bg-white pe-1 ps-3">
          <i class="ri-search-line search-icon fs-18"></i>
        </span>
        <input type="text" class="form-control search-input" placeholder="<?php _e('Search messages or users') ?>">
      </div>
    </div> <!-- Search Box-->
  </div> <!-- .p-4 -->

  <!-- Start chat-message-list -->
  <div class="chat-message-list wa-scroll px-2">

    <?php if (!empty($result)) { ?>
      <ul class="list-unstyled chat-list chat-user-list">
        <?php foreach ($result as $key => $value) : ?>
          <li class="wa-submenu-item unread search-list position-relative">
            <?php $id = $value->ids ?>
            <div class="d-flex">
              <div class="chat-user-img online align-self-center mr-3 ms-0">
                <label for="chatbot_select[]">
                    <img src="<?php _e(get_avatar($value->name)) ?>" class="rounded-circle avatar-xs" alt="">
                    <span class="user-status"></span>
                  </label>
              </div>

              <div class="flex-1 overflow-hidden">
                <h5 class="text-truncate fs-15 mb-1"><?php _e($value->name) ?></h5>
                <p class="chat-user-message text-truncate fs-11 mb-0"><?php _e($value->keywords) ?></p>
              </div>
              <div class="fs-11">
                <?php _e(time_elapsed_string($value->changed)) ?>
              </div>
            </div>
            <div class="fs-12 text-right position-absolute r-21 t-40 ">
              <input type="checkbox" id="chatbot_select[<?= $value->ids ?>]" name="chatbot_select[]" value="<?= $value->ids ?>">
            </div>
          </li>
        <?php endforeach ?>
      </ul>
    <?php } else { ?>
      <div class="h-100">
        <div class="empty p-t-30">
          <div class="icon"></div>
        </div>
      </div>
    <?php } ?>
  </div>
  <!-- End chat-message-list -->
</div>
<!-- End chats tab-pane -->