pipeline {
  agent any
  stages {
    stage('Check file 1') {
      steps {
        sh 'cat index.php'
      }
    }
    stage('Check file 2') {
      steps {
        sh 'cat .env'
      }
    }
  }
}