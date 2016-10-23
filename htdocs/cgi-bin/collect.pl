#!/usr/bin/perl -w

use CGI ":standard";

sub error {
	print "<script type=\"text/javascript\">alert('Error: file could not be opened in collect.pl');</script>";
    exit(1);
}

sub sucess {
	print "<script type=\"text/javascript\">alert('Success. Thank you!');</script>";
}
sub success{
	print "success!";
}
print header();

my($name, $age, $gender, $email) = (param("name"), param("age"), param("gender"), param("email"));
$newline = $name."-".$age."-".$gender."-".$email;


$LOCK = 2;
$UNLOCK = 8;

open(DAT, ">>DB.txt") ;#or error();
flock(DAT, $LOCK);

print DAT "$newline\n";

flock(DAT, $UNLOCK);
close(DAT);


success();