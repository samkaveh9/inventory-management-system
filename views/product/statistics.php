<?php require_once(__DIR__ . '/../common/head.php'); ?>
<section class="body-main">
    <?php require_once(__DIR__ . '/../common/sidebar.php'); ?>
    <section id="main-body" class="main-body">
        <?php if (strlen($data['message']) > 1) { ?>
            <div class="notice notice-info margin-top-three">
                <strong><?= $data['message'] ?></strong>
            </div>
        <?php } ?>
        <section class="column">
            <section class="column-12">
                <section class="main-body-main">
                    <section class="main-body-main-header">
                        <div class="display-flex justify-content-between margin-bottom-three">
                            <h5>آمار محصولات</h5>
                        </div>
                        <table class="table">
                            <thead>
                                <th>نام انبار</th>
                                <th>تعداد محصولات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($data['products'] >= 1) {
                                    foreach ($data['products'] as $product) {
                                ?>
                                        <tr>
                                            <td><?= $product->name ?></td>
                                            <td><?= $product->count ?> محصول</td>
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