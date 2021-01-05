<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?= $PageIndex ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?= $PageIndexLink ?>"><?= $PageIndex ?></a></li>
                            <?php 
                                if (!isset($PageIndexTwo))
                                {
                                    ?>
                                        <li><?= $PageName ?></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><a href="<?= $PageIndexTwoLink ?>"><?= $PageIndexTwo ?></a></li>
                                    <li><?= $PageName ?></li>
                                    <?php
                                }
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>