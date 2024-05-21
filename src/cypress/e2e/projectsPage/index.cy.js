describe("Projeto", () => {
    beforeEach(() => {
        cy.visit("/");
    });

    it("Garante que o projeto seja clicável", () => {
        cy.get(".mc-header-menu__btn-mobile").click();
        cy.contains(".mc-header-menu__itens a", "Projetos").click();
        cy.url().should("include", "projetos");
        cy.get(".search-filter__actions--form-input").type("Festa Junina");
        cy.wait(1000);
        cy.get('[href="https://mapas.tec.br/projeto/9/"]').last().click();
        cy.wait(1000);
        cy.url().should("include", "/projeto/");
    });
});