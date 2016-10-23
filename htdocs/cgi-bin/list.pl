#!/usr/bin/perl
use CGI ":standard";


sub error {
	print "<script type=\"text/javascript\">alert('Error: file could not be opened in list.pl');</script>";
    exit(1);
}

print header();

$LOCK = 2;
$UNLOCK = 8;
$i = 0;
$selectstr = "<input type=\"checkbox\" name=\"index\" value=\"$i\" />";
@col_titles = ("Select","Name", "Age", "Gender", "E-mail");

@rows = th(\@col_titles);

open(DATA, "<DB.txt") or error();
flock(DAT, $LOCK);


while(my $line = <DATA>){
	my @items=split('-',$line);
  	unshift(@items, $selectstr);
	push(@rows, td(\@items));
    $i++;
}

flock(DAT, $UNLOCK);
close(DAT);


print << 'EOF';
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Unit 3</title>
<link href="../../css/hw3.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css" media="screen">
.header{  
    margin:0; 
    padding: 40px 0px 20px 20px; 
    background-color: #2c58ed;
    background-size: cover;
    color: #fff;
    clear:both;
}
.wrapper{
    margin:0 auto;
}  
.main{  
    width: 60%;
    padding: 40px 40px 20px 40px;
    overflow: hidden;
} 
.left-bar{  
    float: left;
    width:15%;
    padding:40px 0px 20px 20px;
    color: #c9c9c9;
} 
.left-bar ul, ol{
    padding-left: 20px;
}  
.right-bar{  
    float: right; 
    width:15%; 
    padding:40px 20px 20px 0px;
    color: #566473;
}  
.right-bar img{
    width: 100%;
}
.footer{  
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size: small;
    text-align: center;  
    padding: 20px 0 20px 0;
    clear: both;
}   
</style>


</head>
<body>
        <div class="header">
            <h1 class="title">Unit 3: Basic protocol II</h1>
        </div>
       <div class="wrapper">
           <div class="left-bar">
            <h3><a href="/hws/unit3/hw3.html">Return to Unit3 Homework</a></h3>

            </div>
            <div class="right-bar">
                <img src="https://upload.wikimedia.org/wikipedia/en/4/4d/Sherlock_titlecard.jpg" alt="Pic of Sherlock">
                <h3>My favorite TV series</h3>
                <p>
                    <a href="https://en.wikipedia.org/wiki/Sherlock_(TV_series)#/" target=blank>[Wiki]</a> <em>Sherlock</em> is a British-American crime drama television series based on Sir Arthur Conan Doyle's Sherlock Holmes detective stories. Created by Steven Moffat and Mark Gatiss, it stars Benedict Cumberbatch as Sherlock Holmes and Martin Freeman as Doctor John Watson. Ten episodes have been produced, with three-part series airing in 2010, 2012 and 2014, and a special episode airing on 1 January 2016. A fourth series has been commissioned, which began filming in April 2016 for an intended 2017 release. The series is set in the present day, while the one-off special partly features a Victorian period fantasy resembling the original Holmes stories. Sherlock is a co-production between the BBC and WGBH Boston for its Masterpiece anthology series on PBS, with Sue Vertue and Elaine Cameron of Hartswood Films serving as producers. The series is primarily filmed in Cardiff, Wales, with North Gower Street in London used for exterior shots of Holmes and Watson's 221B Baker Street residence.
                </p>
            </div>
            <div class="main">
                <h2>Homework 2: Questionare Result</h2>
EOF
print table(Tr(\@rows));

print << 'EOF';
                <form name = "questionaire" action = "/hws/unit3/hw3.html">
                    <input type = "submit"  value = "Return" />
                </form>
                <form name = "questionaire" action = "/cgi-bin/delete.pl">
                    <input type = "submit"  value = "Want to Delete?" />
                </form>
                



        </div>
        </div>
<div class="footer">
    <p>Web Software Technology, 2016 Fall, PKU | Homework Site</p>
    <p>Fan Naijia 1400012972</p>
</div>  
</body>  
</html>  
EOF
