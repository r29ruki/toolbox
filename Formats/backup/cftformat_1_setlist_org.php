<table>
    <tbody>
    <?php
    //SQLで楽器一覧を取得しておく
    global $wpdb; 
    $query = "SELECT p.ID, p.post_title, p.guid, p.post_status, m.meta_key, m.meta_value FROM wp_posts p INNER JOIN wp_postmeta m ON p.ID = m.post_id WHERE p.post_status = 'publish' AND m.meta_key = 'label'";
    $results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
    $i=0;
    foreach($results as $row) {
        $ID[$i] = $row->ID;
        $label[$i] = $row->meta_value;
        $guid[$i] = $row->guid;
        $i++;
    }
    $custom_fields = get_post_custom();  // 指定した投稿のすべてのカスタムフィールド情報を取得
    $my_custom_field = $custom_fields['name']; // 'name' というキーを持つカスタムフィールドの値を取得
    $my_custom_field_t = $custom_fields['tahara']; // 'tahara' というキーを持つカスタムフィールドの値を取得
    $my_custom_field_s = $custom_fields['sakurai']; // 'sakurai' というキーを持つカスタムフィールドの値を取得
    $my_custom_field_n = $custom_fields['nakagawa']; // 'nakagawa' というキーを持つカスタムフィールドの値を取得
    $my_custom_field_j = $custom_fields['jen']; // 'jen' というキーを持つカスタムフィールドの値を取得
    if ($my_custom_field[0]) {
        ?>
        <tr><th></th>
            <td><b>SONG</b></td>
            <td><b>Tahara</b></td>
            <td><b>Sakurai</b></td>
            <td><b>Nakagawa</b></td>
            <td><b>JEN</b></td>
        </tr>
        <tr><th>M01</th><td><?php 
                echo $my_custom_field[0]; 
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_t[0],$label);
                if ($my_custom_field_t[0] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_t[0];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_t[0];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_s[0],$label);
                if ($my_custom_field_s[0] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_s[0];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_s[0];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_n[0],$label);
                if ($my_custom_field_n[0] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_n[0];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_n[0];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_j[0],$label);
                //echo "label_id=".$label_id;
                //echo ",label=".$label[$label_id];
                //echo ",guid=".$guid[$label_id];
                if ($my_custom_field_j[0] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_j[0];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_j[0];
                }
        ?></td></tr>
        <?php
    }
    ?>
    
    <?php
    if ($my_custom_field[1]) {
        ?>
        <tr><th>M02</th><td><?php 
                echo $my_custom_field[1]; 
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_t[1],$label);
                if ($my_custom_field_t[1] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_t[1];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_t[1];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_s[1],$label);
                if ($my_custom_field_s[1] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_s[1];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_s[1];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_n[1],$label);
                if ($my_custom_field_n[1] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_n[1];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_n[1];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_j[1],$label);
                if ($my_custom_field_j[1] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_j[1];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_j[1];
                }
        ?></td></tr>
        <?php
    }
    ?>
    
    <?php
    if ($my_custom_field[2]) {
        ?>
        <tr><th>M03</th><td><?php 
                echo $my_custom_field[2]; 
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_t[2],$label);
                if ($my_custom_field_t[2] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_t[2];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_t[2];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_s[2],$label);
                if ($my_custom_field_s[2] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_s[2];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_s[2];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_n[2],$label);
                if ($my_custom_field_n[2] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_n[2];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_n[2];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_j[2],$label);
                if ($my_custom_field_j[2] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_j[2];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_j[2];
                }
        ?></td></tr>
        <?php
    }
    ?>
    
    <?php
    if ($my_custom_field[3]) {
        ?>
        <tr><th>M04</th><td><?php 
                echo $my_custom_field[3]; 
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_t[3],$label);
                if ($my_custom_field_t[3] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_t[3];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_t[3];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_s[3],$label);
                if ($my_custom_field_s[3] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_s[3];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_s[3];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_n[3],$label);
                if ($my_custom_field_n[3] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_n[3];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_n[3];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_j[3],$label);
                if ($my_custom_field_j[3] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_j[3];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_j[3];
                }
        ?></td></tr>
        <?php
    }
    ?>
    
    <?php
    if ($my_custom_field[4]) {
        ?>
        <tr><th>M05</th><td><?php 
                echo $my_custom_field[4]; 
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_t[4],$label);
                if ($my_custom_field_t[4] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_t[4];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_t[4];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_s[4],$label);
                if ($my_custom_field_s[4] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_s[4];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_s[4];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_n[4],$label);
                if ($my_custom_field_n[4] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_n[4];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_n[4];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_j[4],$label);
                if ($my_custom_field_j[4] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_j[4];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_j[4];
                }
        ?></td></tr>
        <?php
    }
    ?>
    
    <?php
    if ($my_custom_field[5]) {
        ?>
        <tr><th>M06</th><td><?php 
                echo $my_custom_field[5]; 
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_t[5],$label);
                if ($my_custom_field_t[5] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_t[5];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_t[5];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_s[5],$label);
                if ($my_custom_field_s[5] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_s[5];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_s[5];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_n[5],$label);
                if ($my_custom_field_n[5] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_n[5];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_n[5];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_j[5],$label);
                if ($my_custom_field_j[5] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_j[5];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_j[5];
                }
        ?></td></tr>
        <?php
    }
    ?>
    
    <?php
    if ($my_custom_field[6]) {
        ?>
        <tr><th>M07</th><td><?php 
                echo $my_custom_field[6]; 
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_t[6],$label);
                if ($my_custom_field_t[6] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_t[6];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_t[6];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_s[6],$label);
                if ($my_custom_field_s[6] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_s[6];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_s[6];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_n[6],$label);
                if ($my_custom_field_n[6] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_n[6];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_n[6];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_j[6],$label);
                if ($my_custom_field_j[6] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_j[6];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_j[6];
                }
        ?></td></tr>
        <?php
    }
    ?>
    
    
    <?php
    if ($my_custom_field[7]) {
        ?>
        <tr><th>M08</th><td><?php 
                echo $my_custom_field[7]; 
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_t[7],$label);
                if ($my_custom_field_t[7] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_t[7];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_t[7];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_s[7],$label);
                if ($my_custom_field_s[7] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_s[7];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_s[7];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_n[7],$label);
                if ($my_custom_field_n[7] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_n[7];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_n[7];
                }
            ?></td><td><?php 
                $label_id = array_search($my_custom_field_j[7],$label);
                if ($my_custom_field_j[7] == $label[$label_id]) {
                    ?>
                    <a href="<?php echo $guid[$label_id]; ?>">
                        <?php
                        echo $my_custom_field_j[7];
                        ?>
                    </a>
                    <?php
                }else{
                    echo $my_custom_field_j[7];
                }
        ?></td></tr>
        <?php
    }
    ?>
    
    </tbody>
</table>
