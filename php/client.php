<?php
/**
 * Created by PhpStorm.
 * User: Jovry
 * Date: 17-9-28
 * Time: 下午4:58
 */

namespace php_cpp_demo;

error_reporting(E_ALL);

// 自动加载文件.
require_once __DIR__ . '/Thrift/ClassLoader/ThriftClassLoader.php';
// Thrift生成的php文件.
require_once __DIR__ . '/php_cpp_demo/PhpCppService.php';
require_once __DIR__ . '/php_cpp_demo/Types.php';

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;

// load自动加载
$load = new ThriftClassLoader();
// Thrift命名空间指向其库文件路径.
$load->registerNamespace('Thrift', __DIR__ . '/');
$load->registerDefinition('php_cpp_demo', __DIR__ . '/php_cpp_demo');
$load->register();

// init初始化
$socket = new TSocket('127.0.0.1', 9090);
$trasport = new TBufferedTransport($socket, 1024, 1024);
$protocal = new TBinaryProtocol($trasport);
$client = new PhpCppServiceClient($protocal);

// config
$socket->setSendTimeout(30 * 1000);
$socket->setRecvTimeout(10 * 1000);

// Connect
$trasport->open();

// Create request
$request = new Request();
$request->studentID = 200;

//Call...
$response = $client->getStudentInfo($request);

// print response...
var_dump($response);

// Close
$trasport->close();


