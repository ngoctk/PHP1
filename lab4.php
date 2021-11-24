<?php
function tao_mang($so_ptu, $min, $max, $check_double = false)
{
    $arr = [];
    if (!$check_double) {
        for ($i = 0; $i < $so_ptu; $i++) {
            $arr[] = rand($min, $max);
        }
    } else {
        for ($i = 0; $i < $so_ptu; $i++) {
            if ($i == 0) {
                $arr[] = rand($min, $max);
                continue;
            }
            $flag = true;
            while ($flag == true) {
                $randomValue = rand($min, $max);;
                $count = 0;
                foreach ($arr as $value) {
                    if ($value == $randomValue) {
                        $count++;
                    }
                }
                if ($count == 0) {
                    $arr[] = $randomValue;
                    $flag = false;
                }
            }
        }
    }


    //bài 1
    $length = count($arr);
    $num_chia_5 = 0;
    $num_chia_3 = 0;
    for ($i = 0; $i < $length; $i++) {
        if ($arr[$i] % 5 == 0) {
            $num_chia_5 += $arr[$i];
        } elseif ($arr[$i] % 3 == 0) {
            $num_chia_3 += $arr[$i];
        }
    }

    echo 'Tổng chia hết cho 5:' . $num_chia_5 . '<br>';
    echo 'Tổng chia hết cho 3:' . $num_chia_3 . '<br>';
    //bài 2
    for ($i = 0; $i < $length; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $length; $j++) {
            if ($arr[$j] < $arr[$min]) {
                $min = $j;
            }
        }
        $tmp = $arr[$min];
        $arr[$min] = $arr[$i];
        $arr[$i] = $tmp;
    }


    $sort = '';
    foreach ($arr as $a) {
        $sort .= '<br>' . $a . '<br>';
    }
    echo 'Sắp xếp tăng dần :' . $sort;
    //bài 3
    for ($i = 0; $i < ($length - 2); $i++) {
        for ($j = 0; $j < ($length - 1); $j++) {
            for ($k = 0; $k < $length; $k++) {
                if (($arr[$i] !== $arr[$j]) && ($arr[$j] !== $arr[$k]) && ($arr[$i] !== $arr[$k])) {
                    if ((($arr[$i] + $arr[$j]) > $arr[$k]) && (($arr[$j] + $arr[$k]) > $arr[$i]) && (($arr[$i] + $arr[$k]) > $arr[$j])) {
                        echo $arr[$i] . ',' . $arr[$j] . ',' . $arr[$k] . ' tạo nên tam giác' . '<br>';
                        $p = 0.5 * ($arr[$i] + $arr[$j] + $arr[$k]);
                        echo 'Diện tích tam giác : ' . sqrt($p * ($p - $arr[$i]) * ($p - $arr[$j]) * ($p - $arr[$k])) . '<br>';
                    }
                }
            }
        }
    }
}

tao_mang(5, 1, 50, true);