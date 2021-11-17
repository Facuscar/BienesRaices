/// <reference types="cypress" />

describe('Probar la Autenticación',() => {
    it('Prueba la Autenticación en /login', ()=>{
        cy.visit('/login');

        cy.get('[data-cy="heading-login"]').should('exist');
        cy.get('[data-cy="heading-login"]').invoke('text').should('equal','Iniciar Sesión');

        cy.get('[data-cy="formulario-login"]').should('exist');

        //Ambos campos son obligatorios
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-login"]').should('exist');
        cy.get('[data-cy="alerta-login"]').first().should('have.class','error');
        cy.get('[data-cy="alerta-login"]').first().should('have.text','El mail es obligatorio o no es válido');

        cy.get('[data-cy="alerta-login"]').eq(1).should('have.class','error');
        cy.get('[data-cy="alerta-login"]').eq(1).should('have.text','El password es obligatorio');

        //El usuario exista

        //Verificar la contraseña
    });
});