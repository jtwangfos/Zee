<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/15
 * Time: 上午10:13
 */
?>
<div class="bloc bgc-white l-bloc" id="bloc-2">
    <div class="container bloc-lg">
        <div class="row">
            <div class="col-sm-12">
                <blockquote>
                    <p>
                        Lorem ipsum dolor sit amet, adipiscing elit Aenean commodo ligula eget.
                    </p>
                </blockquote>
                <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                </p>
                <div class="alert alert-success">
                    <p>
                        Yo! This is an alert
                    </p>
                </div>
                <form id="form_1" novalidate success-msg="Your message has been sent." fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!" class="animated fadeInUp">
                    <div class="form-group">
                        <label>
                            Name
                        </label>
                        <input id="name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>
                            Email
                        </label>
                        <input id="email" class="form-control" type="email" required />
                    </div>
                    <div class="form-group">
                        <label>
                            Message
                        </label><textarea id="message" class="form-control" rows="4" cols="50" required></textarea>
                    </div>
                    <button class="bloc-button btn btn-d btn-lg btn-block" type="submit">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
