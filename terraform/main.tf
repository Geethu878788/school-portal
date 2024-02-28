provider "aws" {
  region     = "us-east-1"  # Specify your desired AWS region
  access_key = var.aws_access_key_id
  secret_key = var.aws_secret_access_key
}

resource "aws_instance" "example" {
  ami                    = "ami-0e731c8a588258d0d" 
  instance_type          = "t2.micro"
  key_name               = "demo-project-keys"
  vpc_security_group_ids = ["sg-0803282e676850cd8"]
  tags = {
    Name = "my project"


  }
  
  provisioner "remote-exec" {
    inline = [
      "sudo yum update -y",
      "sudo yum install git -y",
      "mkdir project",
      "sudo yum install -y nodejs npm",
      "node --version",
      "npm --version",
      "cd project",
      "git clone https://github.com/Geethu878788/school-portal",
      "cd school-portal",
      "cd src",
      "sudo npm install -g http-server",
      "http-server -p 5500"
    ]
    
    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = base64decode(var.private_key_base64)
      host        = self.public_ip
    }
  }
}

variable "private_key_base64" {
  description = "Base64 encoded private key content"
  type        = string
}

variable "aws_access_key_id" {
  description = "AWS access key ID"
  type        = string
}

variable "aws_secret_access_key" {
  description = "AWS secret access key"
  type        = string
}