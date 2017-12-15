<?php


final class Email
{
    private $email;
    
    private $msg;
    
    

    private function __construct($email)
    {
        $this->ensureIsValidEmail($email);

        $this->email = $email;
    }

    public static function fromString($email)
    {
        return new self($email);
    }

    public function __toString()
    {
        return $this->email;
    }

    private function ensureIsValidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }
    
    //unit test 1
    public function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    
}//EOF

?>