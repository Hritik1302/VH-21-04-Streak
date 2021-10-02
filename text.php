<div class="row">
    <div class="col-12">
        <ol>
            <?php if ($text): ?>
                <?php foreach ($text as $key => $logo): ?>
                    <li>
                        <h6>
                            <?php echo $logo->info()['description']; ?>
                        </h6>
                        <br><br>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
        </ol>
    </div>
</div>