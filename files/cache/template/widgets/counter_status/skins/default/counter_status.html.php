<?php if(!defined("__XE__"))exit;?><!--#Meta:widgets/counter_status/skins/default/css/widget.css--><?php Context::loadFile(['widgets/counter_status/skins/default/css/widget.css', '', '', '', []]); ?>
<div class="widgetContainer<?php if($__Context->colorset=="black"){ ?> black<?php } ?>">
    <dl class="widgetCounter">
        <dt><?php echo $lang->today ?>:</dt>
        <dd><?php echo number_format($__Context->today_counter->unique_visitor) ?></dd>
        <dt><?php echo $lang->yesterday ?>:</dt>
        <dd><?php echo number_format($__Context->yesterday_counter->unique_visitor) ?></dd>
        <dt><?php echo $lang->total ?>:</dt>
        <dd><?php echo number_format($__Context->total_counter->unique_visitor) ?></dd>
    </dl>
</div>
