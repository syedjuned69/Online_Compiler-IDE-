<?php 
    $language = strtolower($_POST['language']);
    $code = $_POST['code'];
    $input = $_POST['text'];
    $random = substr(md5(mt_rand()), 0, 7);
    $filePath = "temp/" . $random . "." . $language;
    $inputPath = "temp/" . $random . ".txt";
    $programFile = fopen($filePath, "w");
    $inputFile = fopen($inputPath, "w");
    fwrite($programFile, $code);
    fclose($programFile);
    fwrite($inputFile, $input);
    fclose($inputFile);

    //code for debugging
    // $language = "c";

    // $filePath = "temp/example.c";

    //end

    // if($language == "php") {
    //     $output = shell_exec("C:\wamp64\bin\php\php5.6.40\php.exe $filePath 2>&1");
    //     echo $output;
    // }
    if($language == "python") {
        echo shell_exec("python3 $filePath < $input"); //2>&1
    }
    // if($language == "node") {
    //     rename($filePath, $filePath.".js");
    //     $output = shell_exec("node $filePath.js 2>&1");
    //     echo $output;
    // }
    if($language == "c") {
        $outputExe = $random . ".exe";
        echo shell_exec("gcc $filePath < $input");
        echo shell_exec(__DIR__ . "//$outputExe");
        // echo $output;
    }
    if($language == "cpp") {
        $outputExe = $random . ".exe";
        echo shell_exec("g++ $filePath < $input");
        echo shell_exec(__DIR__ . "//$outputExe");
        // echo $output;
    }
    unlink($filePath);
