pipeline{
    agent any
    environment{
        staging_server="107.23.169.163"
    }
    stages{
        stage("Deploy to remote"){
            steps{
                sh 'scp ${WORKSPACE}= root@${staging_server}:/var/www/html/vehicle'
            }

        }
    }
}