/// <references types= cypress />

describe('Prueba la navegación y Routing del Header y Footer',() =>{
    it('Prueba la nagevación del Header', ()=>{
        cy.visit('/');
        cy.get('[data-cy="navegacion-header"]').should('exist');
        cy.get('[data-cy="navegacion-header"]').find('a').should('have.length', 4);

        //Revisar que los enlaces sean correctos
        cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('attr','href').should('equal','/nosotros');
        cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('text').should('equal','Nosotros');

        cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('attr','href').should('equal','/anuncios');
        cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('text').should('equal','Anuncios');

        cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('attr','href').should('equal','/blog');
        cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('text').should('equal','Blog');

        cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('attr','href').should('equal','/contacto');
        cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('text').should('equal','Contacto');
    });
    

    it('Prueba la nagevación del Footer', ()=>{
        cy.get('[data-cy="navegacion-footer"]').should('exist');
        cy.get('[data-cy="navegacion-footer"]').find('a').should('have.length', 4);

        //Revisar que los enlaces sean correctos
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('attr','href').should('equal','/nosotros');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('text').should('equal','Nosotros');

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('attr','href').should('equal','/anuncios');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('text').should('equal','Anuncios');

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('attr','href').should('equal','/blog');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('text').should('equal','Blog');

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr','href').should('equal','/contacto');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('text').should('equal','Contacto');

        cy.get('[data-cy="copyright"]').should('have.prop', 'class').should('equal', 'copyright');
    });
});