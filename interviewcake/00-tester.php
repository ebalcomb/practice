<?php

set_include_path('/Users/ellib/interview-practice/interviewcake');
#include '12-find-in-ordered.php';

class Tester {
    public function test() {
        $arg_list = func_get_args();
        $method_name = $arg_list[0];
        $method_arguments = $arg_list[1];
        $expected_result = $arg_list[2];

        $this->handleInputs($method_name, $method_arguments);
        print_r($this->handleExpectation($expected_result));

        $actual_result = call_user_func_array($method_name, $method_arguments);

        if ($expected_result === $actual_result) {
            print_r($this->handleSuccess());
        } else {
            print_r($this->handleFailure($actual_result));
        }
    }

    private function readable($input) {
        $output = $input;
        if ($input === true) {
            $output = 'true';
        }
        if ($input === false) {
            $output = 'false';
        }

        return $output;
    }

    private function handleInputs($method_name, $method_args) {
        print_r($this->info("RUNNING: ") . $method_name . "\n");

        print_r($this->info("ARGUMENTS:") . "\n");
        for ($i=0; $i < count($method_args); $i++) {
            print_r($method_args[$i]);
            if ($method_args[$i+1]) {
                print_r(", ");
            } else {
                print_r("\n");
            }
        }
    }

    private function handleExpectation($expected) {
        return $this->info("EXPECTED: ") . $this->readable($expected) . "\n" . $this->info("RESULT: ");
    }

    private function handleSuccess() {
        return $this->success("PASSED") . $this->spacer;
    }

    private function handleFailure($actual) {
        return $this->fail("FAILED! " . $this->readable($actual)). $this->spacer;
    }

    private function info($info) {
        return ($this->info_color . $info . $this->end_color);
    }

    private function success($info) {
        return ($this->success_color . $info . $this->end_color);
    }

    private function fail($info) {
        return ($this->fail_color . $info . $this->end_color);
    }

    private $spacer = "\n----------------------------------------------\n";
    private $info_color = "\033[0;30m\033[94m";
    private $fail_color = "\033[1;30m\033[41m";
    private $success_color = "\033[0;30m\033[42m";
    private $end_color = "\033[0m";
}

$tester = new Tester();