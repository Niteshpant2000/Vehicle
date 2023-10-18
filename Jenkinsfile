pipeline{
    agent any
    environment{
       
        SSH_CREDENTIALS = 'MyPHPProjectKey'
        SSH_HOST= " 172.31.25.189"
    }
    stages{
        stage('SSH Access') {
            steps {
                script {
                    // Use the 'sshagent' step to set up SSH agent forwarding
                    sshagent(["${SSH_CREDENTIALS}"]) {
                        // Inside this block, you can run SSH commands or scripts
                        sh "ssh -i ~/.ssh/id_rsa ec2-user@172.31.18.158"
                        sh 'scp -o StrictHostKeyChecking=no -r ${WORKSPACE}= root@${SSH_HOST}:/var/www/html/vehicle'
                    }
                }
            }
        }
      
    }
}
