@extends('errors::minimal')

@section('title', 'Service Unavailable')

@section('code', 503)

@section('message', $exception->getMessage() !="" ? $exception->getMessage() : "Service Unavailable")
