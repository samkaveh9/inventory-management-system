<?php require_once(__DIR__ . '/../common/head.php'); ?>
<section class="body-main">
    <?php require_once(__DIR__ . '/../common/sidebar.php'); ?>
    <section id="main-body" class="main-body">
        <section class="column">
            <section class="column-12">
                <?php if (strlen($data['message']) > 1) { ?>
                    <div class="notice notice-info margin-top-three">
                        <strong><?= $data['message'] ?></strong>
                    </div>
                <?php } ?>
                <section class="main-body-main">
                    <section class="main-body-main-header">
                        <div class="display-flex justify-content-between margin-bottom-three">
                            <h5>محصولات</h5>
                            <a href="<?= ROOT_PATH . 'product/create' ?>" class="button button-sm button-blue">ایجاد محصول</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان محصول</th>
                                    <th>توضیحات</th>
                                    <th>نام انبار</th>
                                    <th>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($data['products'] >= 1) {
                                    foreach ($data['products'] as $product) {
                                ?>
                                        <tr>
                                            <td><?= $product->id ?></td>
                                            <td><?= $product->title ?></td>
                                            <td><?= $product->content ?></td>
                                            <td><?= $product->name ?></td>
                                            <td>
                                                <a href="<?= ROOT_PATH . 'product/edit/' . $product->id ?>" class="button button-sm button-yellow">ویرایش</a>
                                                <a href="<?= ROOT_PATH . 'product/delete/' . $product->id ?>" class="button button-sm button-red">حذف</a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="3">اطلاعاتی جهت نمایش وجود ندارد</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </section>
                </section>
            </section>
        </section>

    </section>
</section>