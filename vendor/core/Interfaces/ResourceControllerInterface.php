<?php namespace Core\Interfaces;

interface ResourceControllerInterface {

    public function index();

    public function create();

    public function save();

    public function show($id);

    public function edit($id);

    public function update($id);

    public function delete($id);

}
