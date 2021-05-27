<?php require_once(__DIR__.'/../common/head.php'); ?>
    <section class="body-main">      
<?php require_once(__DIR__.'/../common/sidebar.php'); ?>
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
                            <h5>انبارها</h5>
                            <a href="<?= ROOT_PATH.'repository/create' ?>" class="button button-sm button-blue">ایجاد انبار</a>
                        </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام انبار</th>
                                        <th>موقعیت</th>
                                        <th>تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if ($data['repositories'] >= 1){
                                        foreach($data['repositories'] as $repository){ 
                                        ?>
                                    <tr>
                                        <td><?= $repository->id ?></td>
                                        <td><?= $repository->name ?></td>
                                        <td><?= $repository->location ?></td>
                                        <td>
                                            <a href="<?= ROOT_PATH.'repository/edit/'.$repository->id ?>" class="button button-sm button-yellow">ویرایش</a>
                                            <a href="<?= ROOT_PATH.'repository/delete/'.$repository->id ?>" class="button button-sm button-red">حذف</a>
                                        </td>
                                    </tr>
                                    <?php }}else{ ?>
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
