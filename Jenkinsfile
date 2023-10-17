pipeline{
    agent any
    environment{
        staging_server="54.83.79.20"
    }
    stages{
        stage("Deploy to remote"){
            steps{
                sh 'scp -o StrictHostKeyChecking=no -r ${WORKSPACE}= root@${staging_server}:/var/www/html/vehicle'
            }

        }
    }
}
