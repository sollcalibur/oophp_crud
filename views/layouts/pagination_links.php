<ul class="pagination">
    <?php
    if ($data['start'] > 1) {
        $page_start_beyond = $data['start'] - 1;
    ?>
        <li class="waves-effect">
            <a href="<?php echo $data['redirect'] . $page_start_beyond; ?>">
                <i class="material-icons">chevron_left</i>
            </a>
        </li>
    <?php
    } else {
    ?>
        <li class="disabled">
            <a>
                <i class="material-icons">chevron_left</i>
            </a>
        </li>
    <?php
    }
    for ($page = $data['start']; $page <= $data['end']; $page++) {
    ?>
        <li class="<?php echo (int) $data['page'] === (int) $page ? 'active' : 'waves-effect'; ?>">
            <a href="<?php echo $data['redirect'] . $page; ?>">
                <?php echo $page; ?>
            </a>
        </li>
    <?php
    }
    if ($data['end'] < $data['total_pages']) {
        $page_end_beyond = $data['end'] + 1;
    ?>
        <li class="waves-effect">
            <a href="<?php echo $data['redirect'] . $page_end_beyond; ?>">
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    <?php
    } else {
    ?>
        <li class="disabled">
            <a>
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    <?php
    }
    ?>
</ul>