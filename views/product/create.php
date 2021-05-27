<?php require_once(__DIR__ . '/../common/head.php'); ?>
<section class="body-main">
    <?php require_once(__DIR__ . '/../common/sidebar.php'); ?>
    <section id="main-body" class="main-body">
        <section class="column">
            <section class="column-8 margin-width-auto">
                <?php if (strlen($data['message']) > 1) { ?>
                    <div class="notice notice-info margin-top-three">
                        <strong><?= $data['message'] ?></strong>
                    </div>
                <?php } ?>
                <section class="main-body-main">
                    <section class="main-body-main-header">
                        <div class="display-flex justify-content-between">
                            <h5>ایجاد محصول</h5>
                            <a href="<?= ROOT_PATH . 'product' ?>" class="button button-sm button-black">انصراف</a>
                        </div>

                        <div class="box margin-top-four">
                            <div class="box-header">
                                <strong>ایجاد محصول</strong>
                            </div>
                            <div class="box-body">
                                <form action="<?= htmlentities($_SERVER['REQUEST_URI']) ?>" method="post">
                                    <!-- <div class="form-sub"> -->
                                    <label>نام محصول</label>
                                    <input type="text" class="input-main display-flex margin-auto" name="title" placeholder="نام محصول را وارد کنید">
                                    <!-- </div> -->

                                    <!-- <div class="form-sub  margin-top-four"> -->
                                    <label>نام انبار</label>
                                    <select class="input-main display-flex margin-auto" name="repository" required>
                                        <option value="">انبار مورد نظر را انتخاب کنید</option>
                                        <?php
                                        foreach ($data['repositories'] as $repository) {
                                        ?>
                                            <option value="<?= $repository->id ?>"><?= $repository->name ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- </div> -->

                                    <!-- <div class="form-sub margin-top-four"> -->
                                    <label>توضیحات محصول</label>
                                    <textarea class="input-main display-flex margin-auto" name="content" cols="30" columns="6" placeholder="توضیحات کوتاهی از محصول را وارد کنید" style="resize: none;"></textarea>
                                    <!-- </div> -->

                                    <button class="button button-sm button-blue" name="btn">ثبت</button>
                                </form>
                            </div>
                        </div>

                    </section>
                </section>
            </section>
        </section>

    </section>
</section>