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
                            <h5>گزارش محصولات</h5>
                        </div>
                        <div class="margin-bottom-three">
                            <form action="<?= htmlentities($_SERVER['REQUEST_URI']) ?>" method="post" class="display-flex justify-content-center">
                               <div class="form-sub margin-left-four">
                                   <label> از تاریخ</label>
                                    <section class="display-flex">
                                        <input type="date" class="input-main" name="start_date"> 
                                    </section>
                               </div>
                               <div class="form-sub margin-right-four">
                                   <label>تا تاریخ</label>
                                    <section class="display-flex">
                                        <input type="date" class="input-main" name="end_date"> 
                                    </section>
                                </div>

                                <div class="form-sub margin-right-four margin-top-four">
                                   <button class="button button-sm button-green" name="btn">ثبت</button>
                                </div>
                            </form>
                        </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان محصول</th>
                                        <th>نام انبار</th>
                                        <th>تاریخ ایجاد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if ($data['products'] >= 1){
                                        foreach($data['products'] as $product){ 
                                        ?>
                                    <tr>
                                        <td><?= $product->id ?></td>
                                        <td><?= $product->title ?></td>
                                        <td><?= $product->name ?></td>
                                        <td><?= $product->created_at ?></td>
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


