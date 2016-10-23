#!/usr/bin/perl
use CGI ":standard";
sub error {
    print "Error: file could not be opened in delete.pl <br/>";
    print end_html();
    exit(1);
}

my @selected_list = param("select");

print header();
print "Your name: ",em($name),
p,
"Your age: ",em($age),
p,
"Your gender: ",em($gender);