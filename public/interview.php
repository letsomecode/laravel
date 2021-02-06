<?php

try {
    echo "Some error";
    throw new Exception('CLGT');
} catch (Exception $e) {

} finally {
    echo "Handle this";
}