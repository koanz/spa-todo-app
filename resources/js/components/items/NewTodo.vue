<template>
    <div id="modal-list" class="modal">
        <div class="card">
            <form class="col s12">
                <div class="card-content black-text" style="max-height: 80%; padding-top: 0;">
                    <div class="row" style="margin-bottom: 0;">
                        <div class="input-field col s6">
                            <i class="material-icons prefix" style="color: #039be5;">list</i>
                            <input type="text" style="font-size: 1.5rem !important;" placeholder="Title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" style="padding-left: 0; margin-bottom: 0;">
                            <i class="material-icons prefix" style="color: #90a4ae;">check_box_outline_blank</i>
                            <input type="text" placeholder="">
                        </div>
                        <div class="col s12" style="padding-left: 0;">
                            <div style="width: 24px; display: inline-block">
                                <i class="material-icons prefix" style="cursor: pointer">add</i>
                            </div>
                            <div style="width: 70px; display: inline-block">
                                <span>Element list</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="checked-element" style="">
                            <ul class="collapsible" style="box-shadow: none; border: 0px;">
                                <li class="active">
                                    <div class="collapsible-header">
                                        <i class="material-icons">arrow_drop_down</i>1 checked element
                                    </div>
                                    <div class="collapsible-body" style="padding-bottom: 0 !important; padding-top: 0 !important; border-bottom: 0px;">
                                        <div class="input-field col s12" style="float: none; padding: 0; margin: 0;">
                                            <i class="material-icons prefix" style="color: #00acc1;">check_box</i>
                                            <textarea id="textarea2" class="materialize-textarea" data-length="120" placeholder="Type here" style="text-decoration: line-through; text-decoration-color: grey"></textarea>
                                        </div>
                                        <div class="input-field col s12" style="float: none; padding: 0; margin: 0;">
                                            <i class="material-icons prefix" style="color: #00acc1;">check_box</i>
                                            <textarea id="textarea2" class="materialize-textarea" data-length="120" placeholder="Type here" style="text-decoration: line-through; text-decoration-color: grey"></textarea>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="container-action" style="width: 180px; position: relative; right: 0;">
                        <button class="btn waves-effect waves-light" type="submit" name="action" style="margin: 0 5px 0 0;">Create</button>
                        <a class="waves-effect waves-light red btn">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        {{--<div class="modal-footer">
            <button class="btn waves-effect waves-light modal-close right">close</button>
        </div>--}}
    </div>
</template>