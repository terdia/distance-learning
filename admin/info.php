<?php
echo $six_digit_random_number = substr(floor(mt_rand(100000, 999999) * (time() / 100)), -6);
