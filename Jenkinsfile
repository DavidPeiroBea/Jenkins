pipeline {
  agent any

  triggers {
    pollSCM('H/2 * * * *') 
  }

  environment {
    SSH_CREDENTIALS_ID = 'UsuarioSSH'  
  }

  stages {
    stage('Checkout') {
      steps {
        checkout scm
      }
    }

    stage('Configurar SSH Known Hosts') {
      steps {
        sshagent([env.SSH_CREDENTIALS_ID]) {
          sh '''
            ssh-keyscan -H 172.32.173.11 >> ~/.ssh/known_hosts
            chmod 644 ~/.ssh/known_hosts
          '''
        }
      }
    }

    stage('Ejecutar playbook Ansible') {
      steps {
        sshagent([env.SSH_CREDENTIALS_ID]) {
          script {
            def sudoPass = sh(script: 'cat /run/secrets/jenkins-secret', returnStdout: true).trim()
            sh "ansible-playbook -i inventario.ini playbook.yml --extra-vars 'ansible_become_pass=${sudoPass}'"
          }
        }
      }
    }
  }
}
