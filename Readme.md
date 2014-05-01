# FLASHER - A Codeigniter 3 Based Library

** Flasher ** is a simple flash messaging library to easily view flash / alert
messages in your application. It is stored in the session with different message types
like `success`, `error`, `warning` and `info`. You can also add your own message type. 
And you can add multiple flash messages with mix of different types without any problem.
Works in both *current page request* and after `*edirect request*.


## Requirement

Codeigniter v3.x. with the *CI_Session* Library as Dependency.

Haven't tested in Codeigniter v1.7 or v2.x but hopefully it will work.


## Installation

- Copy the `application/libraries/Flasher.php` file to your `application/libraries` directory / folder.
- Load the library using ``$this->load->library('flasher');`` or add `flasher` in the
  ``$autoload['libraries']`` array at ``application/config/autoload.php``.
- Copy the `application/views/partials` directory / folder to your ``application/views`` directory / folder.
  This is used as your flash templates.
- In your main layout / template view file, add this
	``<?php $this->load->view('partials/flash_messages/bootstrap') ?>``. (Here **bootstrap** is 
	one of our flash messages template. You can add your own one and reference it as well.)
- And you are ready.


## Demo / Example

- Copy the `application/controllers/Flasher_test.php` to your ``application/controllers`` directory / folder.
- Copy the `application/views/flasher_test.php` to your ``application/views`` directory / folder.
- And visit the url with uri ``flasher_test`` and ``flasher_test/redirect``.
	(Ex. http://localhost/flasher_test and http://localhost/flasher_test/redirect) 


## Usage

Simply call the message methods in your conroller (or any other place) and 
the messages will add to flash data.

There are 2 way to call the library methods.

- In the usual object method call (Ex. `$this->flasher->methods()`) or
- Static method calls. (Ex. `Flasher::methods()`).


## Methods


``$this->flasher->message(string $message, string $type);``

``Flasher::addMessage(string $message, string $type);``

    Add message with your own custom message type.


``$this->flasher->success(string $message);``

``Flasher::addSuccess(string $message);``

    Add message with success type.


``$this->flasher->error(string $message);``

``Flasher::addError(string $message);``

    Add message with error type.


``$this->flasher->warning(string $message);``

``Flasher::addWarning(string $message);``

    Add message with warning type.


``$this->flasher->info(string $message);``

``Flasher::addInfo(string $message);``

    Add message with info type.


``$this->flasher->success(string $message);``

``Flasher::addSuccess(string $message);``

    Add message with success type.


``array $this->flasher->get();``

``array Flasher::getAll();``

    Get all flash messages returned as assosiative array with the types as keys and their messages in array. 


``array $this->flasher->clear();``

``array Flasher::clearAll();``

    Clear all flash messages. Best to use after viewing the flash messages. 


## Templating Flash Messages

With this library I have provided 2 sample partial templates / view files to let you understand how templating is done. You can edit or create flash templates as required. Then from your main layout / template file you load the view with refering that partial flash template.

Important thing to remember is that you call the ``clear() || clearAll()`` method at end of file to clean up all the flash data after viewing them.


## Found Issues?

Please post them in the [issues](https://github.com/abdmaster/ci_flasher/issues/new) section.


## License

- **Author**: Ahmedul Haque Abid ([a_h_abid@hotmail.com](mailto:a_h_abid@hotmail.com)), 2014.  
- **License**: The MIT License (MIT), http://opensource.org/licenses/MIT