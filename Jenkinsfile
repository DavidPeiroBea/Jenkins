pipeline {
  agent any

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
            mkdir -p ~/.ssh
            chmod 700 ~/.ssh
            ssh-keyscan -H 172.32.173.9 >> ~/.ssh/known_hosts
            chmod 644 ~/.ssh/known_hosts
          '''
        }
      }
    }

    stage('Ejecutar playbook Ansible') {
      steps {
        sshagent([env.SSH_CREDENTIALS_ID]) {
          script {
            def sudoPass = sh(script: 'cat /run/secrets/jenkins.secret.txt', returnStdout: true).trim()
            sh "ansible-playbook -i inventario.ini playbook.yml --extra-vars 'ansible_become_pass=${sudoPass}'"
          }
        }
      }
    }
  }
}
