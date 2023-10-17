pipeline{
    agent any
    environment{
       
        SSH_CREDENTIALS = 'your-ssh-credentials-id'
        SSH_HOST= " 172.31.18.158"
    }
    stages{
      
        stage("Deploy to remote"){
            
            steps{
                sh 'scp -o StrictHostKeyChecking=no -r ${WORKSPACE}= root@${SSH_HOST}:/var/www/html/vehicle'
            }

        }
    }
}
