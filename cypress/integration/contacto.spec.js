/// <references types= cypress />

describe('Prueba el formulario de contacto', ()=>{
    it('Prueba la página de contacto y el envio de emails', ()=>{
        cy.visit('/contacto');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal','Contacto');

        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal','Llene el formulario de contacto');
    });

    it('Llena los campos del formulario', ()=>{
        cy.get('[data-cy="input-nombre"]').type('Facundo');
        cy.get('[data-cy="input-mensaje"]').type('Quiero comprar una casa');
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-precio"]').type('900000');
        cy.get('[data-cy="forma-contacto"]').eq(1).check();

        cy.wait(3000);

        cy.get('[data-cy="forma-contacto"]').eq(0).check();

        cy.get('[data-cy="input-telefono"]').type('1153324327');
        cy.get('[data-cy="input-fecha"]').type('2021-09-03');
        cy.get('[data-cy="input-hora"]').type('09:00');

        cy.get('[data-cy="formulario-contacto"]').submit();

        cy.get('[data-cy="alerta-envio-formulario"]').should('exist');
        cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal', 'Mensaje enviado correctamente');
        cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta').and('have.class', 'exito');

    });
});