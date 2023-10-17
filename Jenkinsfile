pipeline{
    agent any
    environment{
       
        SSH_CREDENTIALS = 'ubuntu'
        SSH_HOST= " 172.31.18.158"
    }
    stages{
        stage('SSH Access') {
            steps {
                script {
                    // Use the 'sshagent' step to set up SSH agent forwarding
                    sshagent(["${SSH_CREDENTIALS}"]) {
                        // Inside this block, you can run SSH commands or scripts
                        sh "ssh -i /path/to/your/private-key.pem ${env.SSH_HOST} "
                        sh 'scp -o StrictHostKeyChecking=no -r ${WORKSPACE}= root@${SSH_HOST}:/var/www/html/vehicle'
                    }
                }
            }
        }
      
    }
}
