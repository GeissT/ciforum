<?php foreach($forums as $forum) { ?>

<tr>
    <td id="indexForumItemTitle"><b><a href="<?= site_url('forum/' . $forum->fid) ?>"><?= $forum->title ?></a></b></td>
    <td rowspan="2" id="borderUnderRow"><center>0</center></td>
</tr>
<tr>
    <td id="borderUnderRow"><?= $forum->description ?></td>
</tr>
    
<?php } ?>