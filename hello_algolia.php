<?php
// hello_algolia.php
require __DIR__."/vendor/autoload.php";
use Algolia\AlgoliaSearch\SearchClient;

// Connect and authenticate with your Algolia app
$client = SearchClient::create("WI2WFQVE2W", "427b5ff2ee04408fbd94efd15b0ac729");

// Create a new index and add a record
$index = $client->initIndex("test_index");
$record = ["objectID" => 1, "name" => "test_record"];
$index->saveObject($record)->wait();

// Search the index and print the results
$results = $index->search("test_record");
var_dump($results["hits"][0]);
